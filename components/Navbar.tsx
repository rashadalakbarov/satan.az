import React from "react";
import Image from "next/image";

import { getApi } from "@/lib/api";
import { SiteSettings } from "@/ts/types";
import Link from "next/link";

import { FaSearch } from "react-icons/fa";
import { FaPlus } from "react-icons/fa";

export default async function Navbar() {
  const settings: SiteSettings | null = await getApi("configs");

  if (!settings) return null;

  const logoSrc = settings.logo_url?.value
    ? `${process.env.NEXT_PUBLIC_API_URL}/${settings.logo_url.value}`
    : "/default-logo.png"; // public klasöründeki varsayılan logo
  return (
    <nav className="navbar navbar-expand-lg">
      <div className="container">
        <div>
          <button className="navbar-toggler me-2" type="button">
            <span className="navbar-toggler-icon"></span>
          </button>
          <Link className="navbar-brand" href="/">
            <Image
              src={logoSrc}
              alt="Bootstrap"
              width="30"
              height="24"
              className="me-2"
            />
            {settings.site_name?.value}
          </Link>
        </div>

        <div className="d-flex align-items-center justify-content-center">
          <form className="d-flex position-relative" role="search">
            <div className="input-group">
              <input
                type="text"
                className="form-control"
                placeholder="Axtar ..."
              />
              <span className="input-group-text bg-white">
                <FaSearch />
              </span>
            </div>
          </form>
          <Link
            href={"/yeni-elan"}
            className="btn btn-success text-capitalize ms-2"
          >
            <FaPlus className="me-2" />
            Yeni elan
          </Link>
        </div>
      </div>
    </nav>
  );
}
