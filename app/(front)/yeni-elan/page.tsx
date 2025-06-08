import React from "react";
// import Image from "next/image";
import { getApi } from "@/lib/api";
import { SiteSettings } from "@/ts/types";

// components
import CityForm from "@/components/CityForm";

export default async function YeniElan() {
  const settings: SiteSettings | null = await getApi("configs");

  if (!settings) return null;
  return (
    <section className="mt-5">
      <div className="row">
        <h2>Elan Yerləşdir</h2>
      </div>
      <form action="">
        <div className="row mt-4">
          <div className="col-12 col-lg-7">
            <div className="card text-dark bg-light mb-3">
              <div className="card-header">İstifadəçi Məlumatları</div>
              <div className="card-body">
                <div className="form-floating mb-2">
                  <input
                    type="text"
                    className="form-control"
                    id="nameInput"
                    placeholder=""
                    name="username"
                  />
                  <label htmlFor="nameInput">Əlaqədar şəxs</label>
                </div>

                <div className="form-floating mb-2">
                  <input
                    type="email"
                    className="form-control"
                    id="emailInput"
                    placeholder=""
                    aria-describedby="emailHelp"
                    name="email"
                  />
                  <label htmlFor="emailInput">E-poçt</label>
                  <div id="emailHelp" className="form-text">
                    E-poçtunuz heç bir halda qarşı tərəfə gösətrilməyəcək.
                  </div>
                </div>

                <div className="form-floating mb-2">
                  <input
                    type="text"
                    className="form-control"
                    id="phoneInput"
                    placeholder=""
                    name="phone"
                  />
                  <label htmlFor="phoneInput">Telefon</label>
                </div>
              </div>
            </div>

            <div className="card text-dark bg-light mb-3">
              <div className="card-header">Elan</div>
              <div className="card-body">
                <div className="mb-2">
                  <label htmlFor="selectcat" className="form-label">
                    Elanınız məzmununa uyğun kateqoriya seçin
                  </label>
                  {/* <select
                      className="form-select"
                      aria-label="Default select example"
                      id="selectcat"
                    >
                      <option selected>Kateqoriya seçin</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select> */}
                </div>
                <div className="mb-2">
                  {/* <select
                      className="form-select"
                      aria-label="Default select example"
                      id="selectsubcat"
                    >
                      <option selected>Alt Kateqoriya seçin</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select> */}
                </div>

                <CityForm />

                <div className="form-floating mb-2">
                  <input
                    type="text"
                    name="price"
                    className="form-control"
                    id="textPrice"
                    placeholder="name@example.com"
                  />
                  <label htmlFor="textPrice">Qiymət, AZN</label>
                </div>

                <div className="form-floating mb-2">
                  <textarea
                    className="form-control"
                    placeholder="Ətraflı məlumatı buraya daxil edin"
                    id="textareaMezmun"
                    name="description"
                    style={{ height: "150px" }}
                  ></textarea>
                  <label htmlFor="textareaMezmun">Məzmun</label>
                </div>

                <div className="mb-3">
                  <label htmlFor="formFile" className="form-label">
                    Şəkillər
                  </label>
                  <input className="form-control" type="file" id="formFile" />
                </div>
                <ul className="add-img">
                  <li>
                    <div className="img-data">
                      {/* <Image
                          width={100}
                          height={100}
                          src="assets/img/elanlar/1649688653.jpg"
                          alt=""
                        /> */}
                      <button
                        type="button"
                        className="btn-close"
                        aria-label="Close"
                      ></button>
                    </div>
                  </li>
                  <li>
                    <div className="img-data">
                      {/* <Image
                          width={100}
                          height={100}
                          src="assets/img/elanlar/26677_r-IcNKds7H2B6al5nCau-g.jpg"
                          alt=""
                        /> */}
                      <button
                        type="button"
                        className="btn-close"
                        aria-label="Close"
                      ></button>
                    </div>
                  </li>
                  <li>
                    <div className="img-data">
                      {/* <Image
                          width={100}
                          height={100}
                          src="assets/img/elanlar/4ddada59587fb2de3a53026fbd27218a_avatar.jpeg"
                          alt=""
                        /> */}
                      <button
                        type="button"
                        className="btn-close"
                        aria-label="Close"
                      ></button>
                    </div>
                  </li>
                  <li>
                    <div className="img-data">
                      {/* <Image
                          width={100}
                          height={100}
                          src="assets/img/elanlar/8acd66d88ab11ae5ff58c4a1ee.jpeg"
                          alt=""
                        /> */}
                      <button
                        type="button"
                        className="btn-close"
                        aria-label="Close"
                      ></button>
                    </div>
                  </li>
                  <li>
                    <div className="img-data">
                      {/* <Image
                          width={100}
                          height={100}
                          src="assets/img/elanlar/kia rio.jpg"
                          alt=""
                        /> */}
                      <button
                        type="button"
                        className="btn-close"
                        aria-label="Close"
                      ></button>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <p>
              Elan yerləşdirərək, siz {settings.site_name?.value}-ın İstifadəçi
              razılaşması ilə razı olduğunuzu təsdiq edirsiniz.
            </p>
            <button type="submit" className="btn btn-success w-100 mt-3">
              Yarat
            </button>
          </div>
          <div className="col-12 col-lg-5">text alani</div>
        </div>
      </form>
    </section>
  );
}
