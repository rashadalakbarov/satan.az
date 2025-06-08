import React from "react";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";

interface FrontLayoutProps {
  children: React.ReactNode;
}

const FrontLayout = ({ children }: FrontLayoutProps) => {
  return (
    <div>
      <Navbar />
      <div className="container my-3">{children}</div>
      <Footer />
    </div>
  );
};

export default FrontLayout;
