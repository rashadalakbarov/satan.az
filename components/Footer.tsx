import React from 'react'

import { getSiteSettings } from '@/lib/config';

import { FaInstagram } from "react-icons/fa";

export default async function Footer() {
    const settings = await getSiteSettings();
  return (
    <footer>
        <div className="container">
            <div className="row">
                <div className="footer-content">
                    <h1>{settings.site_name}</h1>
                    <p>Saytın rəhbərliyi reklam bannerlərinin və yerləşdirilmiş elanların məzmununa şəklillərinə görə məsuliyyət daşımır</p>
                    <ul className="custom">
                        <li><a href="" target="_blank"><FaInstagram /></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div className="footer-bottom">
            <div className="container h-100">
                <div className="row h-100">
                    <div className="flex-between-center">
                        <p className="mb-0 px-3 text-center">Copyright &copy; {new Date().getFullYear()} {settings.site_name} | Bütün Hüquqlar Qorunur</p>
                        <ul className="custom">
                            <li><a href="../index">Ana Səhifə</a></li>
                            <li><a href="../about">Haqqımızda</a></li>
                            <li><a href="../rules">Qaydalar</a></li>
                            <li><a href="../contact">Əlaqə</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
  )
}