import React from "react";

const RegisterPage = () => {
  return (
    <section className="mt-5">
      <div className="row">
        <div className="col-12 col-lg-6">
          <h2 className="mb-4">Yeni hesab yarat</h2>
          <form className="mb-5">
            <div className="mb-3">
              <label htmlFor="exampleInputEmail1" className="form-label">
                Adınız
              </label>
              <input
                type="text"
                className="form-control"
                id="exampleInputEmail1"
              />
            </div>
            <div className="mb-3">
              <label htmlFor="exampleInputEmail1" className="form-label">
                E-poçt
              </label>
              <input
                type="email"
                className="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
              />
              <div id="emailHelp" className="form-text">
                E-poçtunuz heç bir halda qarşı tərəfə gösətrilməyəcək.
              </div>
            </div>
            <div className="mb-3">
              <label htmlFor="exampleInputEmail1" className="form-label">
                Mobil nömrə
              </label>
              <input
                type="text"
                className="form-control"
                id="exampleInputEmail1"
              />
            </div>
            <div className="mb-3">
              <label htmlFor="exampleInputPassword1" className="form-label">
                Şifrə
              </label>
              <div className="position-relative">
                <input
                  type="password"
                  className="form-control"
                  id="exampleInputPassword1"
                />
                <i className="fas fa-eye-slash eye_passw"></i>
              </div>
            </div>
            <div className="mb-3">
              <label htmlFor="exampleInputPassword1" className="form-label">
                Şifrənin təkrarı
              </label>
              <div className="position-relative">
                <input
                  type="password"
                  className="form-control"
                  id="exampleInputPassword1"
                />
                <i className="fas fa-eye-slash eye_passw"></i>
              </div>
            </div>
            <button type="submit" className="btn btn-primary w-100">
              Hesab Yarat
            </button>
          </form>
          <div className="w-100 text-center">
            <a href="login.html" className="text-decoration-none">
              Artıq hesabınız var? Daxil ol
            </a>{" "}
          </div>
        </div>
      </div>
    </section>
  );
};

export default RegisterPage;
