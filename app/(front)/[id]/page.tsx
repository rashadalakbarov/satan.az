import React from "react";

const DetailPage = () => {
  return (
    <section>
      <div className="container">
        <div className="row">
          <div className="col-12 mt-5">
            <nav aria-label="breadcrumb">
              <ol className="breadcrumb">
                <li className="breadcrumb-item">
                  <a href="#">Ana Səhifə</a>
                </li>
                <li className="breadcrumb-item">
                  <a href="#">Daşınmaz Əmlak</a>
                </li>
                <li className="breadcrumb-item active" aria-current="page">
                  Xalqlar Dostluğu metrosu yaxınlığında 2 otaqlı qazlı kupçalı
                  təmirli yenitikili mənzil satılır.
                </li>
              </ol>
            </nav>
          </div>
          <div className="col-12 my-3">
            <h1>
              Xalqlar Dostluğu metrosu yaxınlığında 2 otaqlı qazlı kupçalı
              təmirli yenitikili mənzil satılır.
            </h1>
          </div>
          <div className="col-12 col-md-8">
            <div
              className="border-radius w-100 d-flex justify-content-center align-items-center"
              style={{ height: "500px", backgroundColor: "#323232" }}
            >
              <img
                src="assets/img/elanlar/kia rio.jpg"
                alt=""
                className="w-75"
              />
            </div>
            <div className="mt-2">
              <div className="owl-carousel owl-theme owl-small-img">
                <div className="item small-img">
                  <a href="#">
                    <img src="assets/img/elanlar/1649688653.jpg" alt="" />
                  </a>
                </div>
                <div className="item small-img">
                  <a href="#">
                    <img
                      src="assets/img/elanlar/26677_r-IcNKds7H2B6al5nCau-g.jpg"
                      alt=""
                    />
                  </a>
                </div>
                <div className="item small-img">
                  <a href="#">
                    <img
                      src="assets/img/elanlar/4ddada59587fb2de3a53026fbd27218a_avatar.jpeg"
                      alt=""
                    />
                  </a>
                </div>
                <div className="item small-img">
                  <a href="#">
                    <img
                      src="assets/img/elanlar/8acd66d88ab11ae5ff58c4a1ee.jpeg"
                      alt=""
                    />
                  </a>
                </div>
                <div className="item small-img">
                  <a href="#">
                    <img src="assets/img/elanlar/kia rio.jpg" alt="" />
                  </a>
                </div>
              </div>
            </div>
            <table className="table table-borderless mt-4">
              <tbody>
                <tr>
                  <td width="140" className="fw-bold">
                    Şəhər
                  </td>
                  <td>Bakı</td>
                </tr>
                <tr>
                  <td width="140" className="fw-bold">
                    Kateqoriya
                  </td>
                  <td>Yeni tikili</td>
                </tr>
                <tr>
                  <td width="140" className="fw-bold">
                    Ünvan
                  </td>
                  <td>Баку, Yeni Yasamal 2, 6 B Blok, Азербайджан</td>
                </tr>
                <tr>
                  <td width="140" className="fw-bold">
                    Elan haqqında
                  </td>
                  <td>
                    Maxima cap avadanlığı Vinil cap 1 kv 5 AZN Banner cap 1 kv 5
                    AZN Setka vinil 1 kv 8 AZN ENDIRIMLER 10 GUN ERZINDE DAVAM
                    EDECEK! İstənilən növ reklamların hazirlanması. Stendlər
                    Bilbordlar Endirimli qiymətlərdən yararlanmağa tələsin.
                    Ofisimiz Yeni Yasamal Bizim Marketin yaninda yerləşir.
                    Istenilen nov cap xidmeti
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div className="col-12 col-md-4">
            <div className="w-100 h-100">
              <div className="card text-dark bg-light mb-3">
                <div className="card-header text-center">
                  İstifadəçi Məlumatları
                </div>
                <div className="card-body">
                  <div className="d-flex align-items-center">
                    <div className="profile-img">
                      <img
                        src="assets/img/icons/default-user-image.png"
                        alt=""
                      />
                    </div>
                    <div className="profile-data">
                      <strong>
                        Vaqif Esedov{" "}
                        <span className="text-muted">(mülkiyyətçi)</span>
                      </strong>
                      <a href="#">10 aktiv elan</a>
                      <div className="d-flex align-items-center">
                        <span className="dots"></span>Online
                      </div>
                    </div>
                  </div>
                  <div className="mt-4">
                    <a href="#" className="btn btn-primary">
                      <i className="fas fa-phone"></i>&nbsp; 0515367952
                    </a>
                    <button
                      type="button"
                      className="btn btn-primary"
                      data-bs-toggle="modal"
                      data-bs-target="#exampleModal"
                    >
                      <i className="fas fa-envelope"></i>&nbsp; Mesaj Göndər
                    </button>
                  </div>
                </div>
              </div>
              <div className="card text-dark bg-light mb-3">
                <div className="card-body">
                  <p className="fw-bold">
                    Elanın nömrəsi: <span className="fw-normal">125685</span>
                  </p>
                  <p className="fw-bold">
                    Baxışların sayı: <span className="fw-normal">1255</span>
                  </p>
                  <p className="mb-0 fw-bold">
                    Yeniləndi: <span className="fw-normal">05 Avqust 2022</span>
                  </p>
                </div>
              </div>
              <div className="card text-dark bg-light mb-3">
                <div className="card-body">
                  <h5 className="card-title">Ehtiyatlı Ol</h5>
                  <div className="d-flex align-items-center">
                    <i className="fas fa-user me-3"></i>
                    <span>
                      Satıcı ilə tanış olana, alqı-satqı müqaviləsi imzalayana
                      qədər heç vaxt bank hesabına depozit ödəməyin.
                    </span>
                  </div>
                  <div className="d-flex align-items-center">
                    <i className="fas fa-cash-register me-3"></i>
                    <span>
                      Heç bir ciddi özəl Satıcı görüşməzdən əvvəl ilkin ödəniş
                      tələb etmir.
                    </span>
                  </div>
                  <div className="d-flex align-items-center">
                    <i className="fas fa-user-secret me-3"></i>
                    <span>
                      Diqqət! Tapsat.az Bu hallara görə məsuliyyət daşımır.
                    </span>
                  </div>
                </div>
              </div>
              <ul className="detail-hashtag">
                <li>
                  <a href="#">#Avtomobil</a>
                </li>
                <li>
                  <a href="#">#Kiraye</a>
                </li>
                <li>
                  <a href="#">#Əmlak</a>
                </li>
                <li>
                  <a href="#">#Xalqlar Dostluğu</a>
                </li>
                <li>
                  <a href="#">#yeni tikili</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <hr />
      </div>
    </section>
  );
};

export default DetailPage;
