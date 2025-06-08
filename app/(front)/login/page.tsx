import React from "react";

const LoginPage = () => {
  return (
    <section className="mt-5">
      <div className="row">
        <div className="col-12 col-lg-6">
          <h2 className="mb-4">Hesabınıza daxil olun</h2>
          <form className="mb-5">
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
              <a
                href="#"
                className="text-muted text-decoration-none fs-6 float-end"
              >
                Parolu Unutmuşam
              </a>
            </div>
            <div className="mb-3 form-check">
              <input
                type="checkbox"
                className="form-check-input"
                id="exampleCheck1"
              />
              <label className="form-check-label" htmlFor="exampleCheck1">
                Yadda Saxla
              </label>
            </div>
            <button type="submit" className="btn btn-primary w-100">
              Daxil Ol
            </button>
          </form>
          <div className="w-100 text-center">
            <a href="register.html" className="text-decoration-none">
              Hələ hesabınız yoxdur? Yeni hesab yaradın
            </a>
          </div>
        </div>
      </div>
    </section>
  );
};

export default LoginPage;
