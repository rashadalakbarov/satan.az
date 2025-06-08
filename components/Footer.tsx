import React from "react";

import { getApi } from "@/lib/api";
import { iconMap } from "@/lib/iconMap";
import { SiteSettings } from "@/ts/types";
import Link from "next/link";
import Image from "next/image";

export default async function Footer() {
  const settings: SiteSettings | null = await getApi("configs");

  if (!settings) return null;

  const logoSrc = settings.logo_url?.value
    ? `${process.env.NEXT_PUBLIC_API_URL}/${settings.logo_url.value}`
    : "/default-logo.png"; // public klasöründeki varsayılan logo

  return (
    <div className="container">
      <footer className="py-3 my-4">
        <ul className="nav justify-content-center border-bottom pb-3 mb-3">
          <li className="nav-item">
            <Link href="#" className="nav-link px-2 text-body-secondary">
              Home
            </Link>
          </li>
          <li className="nav-item">
            <Link href="#" className="nav-link px-2 text-body-secondary">
              Features
            </Link>
          </li>
          <li className="nav-item">
            <Link href="#" className="nav-link px-2 text-body-secondary">
              Pricing
            </Link>
          </li>
          <li className="nav-item">
            <Link href="#" className="nav-link px-2 text-body-secondary">
              FAQs
            </Link>
          </li>
          <li className="nav-item">
            <Link href="#" className="nav-link px-2 text-body-secondary">
              About
            </Link>
          </li>
        </ul>
        <div className="d-flex flex-column flex-md-row justify-content-between align-items-center my-3">
          <div className="col-md-8 d-flex align-items-center">
            <Link
              href="/"
              className="me-2 mb-md-0 text-body-secondary text-decoration-none"
            >
              <Image src={logoSrc} alt="" width={30} height={24} />
            </Link>
            <span className="mb-md-0 text-body-secondary">
              Copyright &copy; 2025 {settings.site_name?.value}
            </span>
          </div>
          <ul className="nav mt-2 mt-md-0 col-md-4 justify-content-end list-unstyled d-flex">
            {Object.entries(settings).map(([key, data]) => {
              if (
                key.endsWith("_url") &&
                data.value &&
                data.other &&
                iconMap[data.other]
              ) {
                const Icon = iconMap[data.other];
                return (
                  <li key={key} className="ms-3">
                    <Link
                      href={data.value}
                      target="_blank"
                      rel="noopener noreferrer"
                      className="text-body-secondary"
                    >
                      <Icon />
                    </Link>
                  </li>
                );
              }
              return null;
            })}
          </ul>
        </div>
        <div className="my-3 py-2 border-top text-center">
          <p>
            Saytın Administrasiyası reklam bannerlərinin və yerləşdirilmiş
            elanların məzmununa görə məsuliyyət daşımır.
          </p>
        </div>
      </footer>
    </div>
  );
}
