const ImgBuku = document.querySelector("#imageBuku");
const fileBuku = document.querySelector("#fileBuku");
const url = "http://localhost:8080/";

ImgBuku.addEventListener("click", function (e) {
  fileBuku.click();
  fileBuku.addEventListener("change", function (even) {
    const Image = URL.createObjectURL(even.target.files[0]);
    e.target.src = Image;
  });
});

// fetch ebook
function getEbook(id) {
  fetch(`${url}admin/api/ebook/${id}`)
    .then((res) => res.json())
    .then((res) => {
      document.querySelector("#nama").textContent = res.nama;
      document.querySelector("#prodi").textContent = res.nama_prodi;
      document.querySelector("#pengapu").textContent = res.pengapu;
      document.querySelector("#deskripsi").textContent = res.deskripsi;
      document
        .querySelector("#foto")
        .setAttribute("src", `/img/ebook/${res.foto}`);
      // views pdf
      let path = "/admin/buku/ebook/getPdf/" + res.id;
      document
        .getElementById("pdf")
        .setAttribute("href", `/admin/buku/ebook/getPdf/${res.id}`);
      // download pdf
      document
        .getElementById("download-pdf")
        .setAttribute("href", `/admin/api/downloadEbook/${res.id}`);
    });
}

function updateEbook(id) {
  fetch(`${url}admin/api/update/${id}`)
    .then((res) => res.json())
    .then((res) => {
      document
        .getElementById("form-update")
        .setAttribute("action", `${url}admin/buku/ebook/update/${res.id}`);
      document
        .getElementById("update_nama")
        .setAttribute("value", `${res.nama}`);
      document
        .getElementById("update_kategori")
        .setAttribute("value", `${res.kategori}`);
      document.getElementById("update_kategori").innerText = res.nama_kategori;
      document
        .getElementById("update_prodi")
        .setAttribute("value", `${res.prodi}`);
      document.getElementById("update_prodi").innerText = res.nama_prodi;
      document
        .getElementById("update_pengapu")
        .setAttribute("value", `${res.pengapu}`);
      document.getElementById("update_deskripsi").innerText = res.deskripsi;
      document
        .getElementById("imageBuku")
        .setAttribute("src", `${url}img/ebook/${res.foto}`);
      document
        .getElementById("file_ebook_lama")
        .setAttribute("value", `${res.file}`);
      document.getElementById("foto_lama").setAttribute("value", `${res.foto}`);
    });
}
// pengaturan prodi
function addProdi() {
  document.getElementById("title").textContent = "Tambah Data Prodi";
  let body = `
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama_prodi">Nama Prodi</label>
                <input type="text" name="nama_prodi" required class="form-control" id="nama_prodi" placeholder="Masukan nama prodi">
            </div>
        </div>
    </div>
  </div>
  <div class="modal-footer">
  <button type="reset" class="btn btn-secondary"><i class="fa fa-close"></i> Reset</button>
  <button onclick="saveProdi()" class="btn btn-primary"><i class="fa fa-plus"></i> Save</button>
  </div>
    `;
  document.getElementById("modal-body").innerHTML = body;
}
function saveProdi() {
  let data = document.getElementById("nama_prodi").value;
  $.ajax({
    type: "post",
    url: `${url}admin/api/prodi`,
    data: {
      nama_prodi: data,
    },
    success: function (msg) {
      let node = `
      <tr>
          <td class="text-center">${data}</td>
          <td class="text-center">
              <a href="" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Edit</a>
              <a href="" class="btn btn-danger"><i class="fa fa-fa-trash"></i> Hapus</a>
          </td>
      </tr>
      `;
      alert(msg.message);
      document.getElementById("tabel-body").firstElementChild.innerHTML = node;
    },
    error: function (err) {
      console.log(err);
    },
  });
}
function findProdi(id) {
  fetch(`${url}admin/api/prodi/${id}`)
    .then((res) => res.json())
    .then((res) => {
      document.getElementById("title").textContent = "Edit Data Prodi";
      let body = `
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama_prodi">Nama Prodi</label>
                <input type="text" name="nama_prodi" value="${res.nama_prodi}" required class="form-control" id="nama_prodi">
            </div>
        </div>
    </div>
  </div>
  <div class="modal-footer">
  <button type="reset" class="btn btn-secondary"><i class="fa fa-close"></i> Reset</button>
  <button onclick="updateProdi(${res.id_prodi}, event)" class="btn btn-primary"><i class="fa fa-plus"></i> Save</button>
  </div>
    `;
      document.getElementById("modal-body").innerHTML = body;
    });
}
function updateProdi(id) {
  $.ajax({
    type: "post",
    url: `${url}admin/api/updateprodi/${id}`,
    data: {
      nama_prodi: document.getElementById("nama_prodi").value,
    },
    success: (res) => {
      let oldElement = document.getElementById(id);
      const newelement = `
      <tr id="${id}">
          <td class="text-center">${
            document.getElementById("nama_prodi").value
          }</td>
          <td class="text-center">
              <div data-toggle="modal" onclick="findProdi(${id})" id="update_prodi" data-target="#modal_prodi" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Edit</div>
              <div onclick="deleteProdi(${id}, event)" class="btn btn-danger"><i class="fa fa-fa-trash"></i> Hapus</div>
          </td>
  </tr>`;
      oldElement.innerHTML = newelement;
      alert(res.message);
    },
  });
}
function deleteProdi(id, event) {
  fetch(`${url}admin/api/deleteprodi/${id}`)
    .then((res) => res.json())
    .then((res) => alert("Data Berhasil dihapus"));
  // delete element
  event.target.parentElement.parentElement.remove();
}

// kategori
function findKategori(id) {
  const modalBody = document.getElementById("modal-body");
  fetch(`${url}admin/api/kategori/${id}`)
    .then((res) => res.json())
    .then((res) => {
      let element = `
      <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <label for="nama_prodi">Nama Kategori</label>
              <input type="text" name="nama_kategori" value="${res.nama_kategori}" required class="form-control" id="nama_kategori">
          </div>
      </div>
      </div>
      </div>
      <div class="modal-footer">
      <button type="reset" class="btn btn-secondary"><i class="fa fa-close"></i> Reset</button>
      <button onclick="updateKategori(${res.id_kategori}, event)" class="btn btn-primary"><i class="fa fa-plus"></i> Update</button>
      </div>
      `;
      modalBody.innerHTML = element;
    });
}
function updateKategori(id) {
  $.ajax({
    url: `${url}admin/api/updateKategori/${id}`,
    type: "post",
    data: {
      nama_kategori: document.getElementById("nama_kategori").value,
    },
    success: (res) => {
      alert(res.message);
      let oldElement = document.getElementById(id);
      let newElemet = `
          <td class="text-center">${
            document.getElementById("nama_kategori").value
          }</td>
          <td class="text-center">
              <div data-toggle="modal" onclick="findKategori(${id})" id="update_kategori" data-target="#modal_kategori" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Edit</div>
              <div onclick="deleteKategori(${id}, event)" class="btn btn-danger"><i class="fa fa-fa-trash"></i> Hapus</div>
          </td>
      `;
      oldElement.innerHTML = newElemet;
    },
    error: (err) => {
      console.log(err);
    },
  });
}
function addKategori() {
  const modal = document.getElementById("modal-body");
  let element = `
      <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <label for="nama_prodi">Nama Kategori</label>
              <input type="text" name="nama_kategori" required class="form-control" placeholder="Tambah data kategori" id="nama_kategori">
          </div>
      </div>
      </div>
      </div>
      <div class="modal-footer">
      <button type="reset" class="btn btn-secondary"><i class="fa fa-close"></i> Reset</button>
      <button onclick="saveKategori(), event" class="btn btn-primary"><i class="fa fa-plus"></i> Save</button>
      </div>
      `;
  modal.innerHTML = element;
}
function saveKategori() {
  $.ajax({
    url: `${url}admin/api/saveKategori`,
    type: "post",
    data: {
      nama_kategori: document.getElementById("nama_kategori").value,
    },
    success: (res) => {
      alert(res.message);
      window.location.reload();
    },
    error: (err) => {
      console.log(err);
    },
  });
}
function deleteKategori(id, event) {
  fetch(`${url}admin/api/deleteKategori/${id}`)
    .then((res) => res.json())
    .then((res) => {
      event.target.parentElement.parentElement.remove();
      alert(res.message);
    });
}
