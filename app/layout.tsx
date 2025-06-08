import type { Metadata } from "next";
import { Geist, Geist_Mono } from "next/font/google";
import "./globals.css";

import "bootstrap/dist/css/bootstrap.min.css";

const geistSans = Geist({
  variable: "--font-geist-sans",
  subsets: ["latin"],
});

const geistMono = Geist_Mono({
  variable: "--font-geist-mono",
  subsets: ["latin"],
});

export const metadata: Metadata = {
  title:
    "Satan.az — Pulsuz Elanlar Saytı — Maşın, Ev, Telefon, Geyim, Mebel — Bakı, Azərbaycan",
  description:
    "Satan.az – pulsuz elanlar, geniş imkanlar! Avtomobillər, Daşınmaz əmlak, Telefonlar, Xidmətlər – almaq və satmaq heç vaxt bu qədər asan olmayıb! ",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
      <body className={`${geistSans.variable} ${geistMono.variable}`}>
        <>{children}</>
      </body>
    </html>
  );
}
