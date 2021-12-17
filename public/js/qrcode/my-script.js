window.addEventListener("load", function () {
  let selectedDeviceId;
  const codeReader = new ZXing.BrowserMultiFormatReader();
  codeReader
    .listVideoInputDevices()
    .then((videoInputDevices) => {
      const sourceSelect = document.getElementById("sourceSelect");
      selectedDeviceId = videoInputDevices[0].deviceId;
      if (videoInputDevices.length >= 1) {
        videoInputDevices.forEach((element) => {
          const sourceOption = document.createElement("option");
          sourceOption.text = element.label;
          sourceOption.value = element.deviceId;
          sourceSelect.appendChild(sourceOption);
        });

        sourceSelect.onchange = () => {
          selectedDeviceId = sourceSelect.value;
        };

        const sourceSelectPanel = document.getElementById("sourceSelectPanel");
        sourceSelectPanel.style.display = "block";
      }

      document.getElementById("startButton").addEventListener("click", () => {
        codeReader.decodeFromVideoDevice(
          selectedDeviceId,
          "video",
          (result, err) => {
            if (result) {
              $.ajax({
                url: `http://localhost:8080/admin/api/show/${result}`,
                type: "GET",
                success: function (data) {
                  document.getElementById("qr-nama").innerText = data[0].nama;
                  document.getElementById("qr-kartu-pelajar").innerText =
                    data[0].nomer_pelajar;
                  document.getElementById("qr-tempat-tinggal").innerText =
                    data[0].ttl;
                  document.getElementById("qr-kelas").innerText = data[0].kelas;
                  document.getElementById("qr-prodi").innerText = data[0].prodi;
                  document
                    .getElementById("qr-image")
                    .setAttribute(
                      "src",
                      `http://localhost:8080/img/Anggota/${data[0].foto}`
                    );
                },
                error: function (err) {
                  console.log(err);
                },
              });
              // document.getElementById("result").textContent = result.text;
            }
            if (err && !(err instanceof ZXing.NotFoundException)) {
              document.getElementById("result").textContent = err;
            }
          }
        );
      });

      document.getElementById("resetButton").addEventListener("click", () => {
        codeReader.reset();
        // document.getElementById("result").textContent = "";
      });
    })
    .catch((err) => {
      console.error(err);
    });
});
