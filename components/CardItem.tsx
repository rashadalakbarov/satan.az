import React from "react";
import Image from "next/image";

import { MdFavoriteBorder } from "react-icons/md";

const CardItem = () => {
  return (
    <div className="col-6 col-md-4 col-xl-3 card-responsive">
      <div className="card mb-3 w-100" style={{ height: "17rem" }}>
        <div className="position-relative" style={{ height: "134px" }}>
          <div
            className="position-absolute px-3 d-flex align-items-center w-100 justify-content-between"
            style={{ top: "10px" }}
          >
            <span>1</span>
            <MdFavoriteBorder className="fs-4 text-muted" />
          </div>
          <div
            className="position-absolute px-3 d-flex align-items-center w-100 justify-content-between"
            style={{ bottom: "10px" }}
          >
            <span
              className="bg-success text-white py-1 px-2 fs-6"
              style={{ borderRadius: "4px" }}
            >
              Mağaza
            </span>
            <div>
              <Image
                src={"icons/vip.svg"}
                alt="vip"
                width={15}
                height={15}
                className="ms-2"
              />
              <Image
                src={"icons/premium.svg"}
                alt="vip"
                width={15}
                height={15}
                className="ms-2"
              />
            </div>
          </div>
          {/* <Image
            className="card-img-top h-100"
            src="assets/img/elanlar/kia rio.jpg"
            alt="Card image cap"
            width={100}
            height={100}
          /> */}
        </div>
        <div className="card-body pb-0">
          <h5>15 000 AZN</h5>
          <a href="detail.html" className="text-decoration-none text-dark">
            <p className="card-text">
              Some quick example text to build on the card title
            </p>
          </a>
        </div>
        <div
          className="card-footer"
          style={{ border: "none", backgroundColor: "transparent" }}
        >
          <small className="text-muted">Bakı, bu gün, 09:18</small>
        </div>
      </div>
    </div>
  );
};

export default CardItem;
