import Link from "next/link";
import React from "react";

type SectionTitleProps = {
  title: string;
};

const SectionTitle = ({ title }: SectionTitleProps) => {
  return (
    <div className="row">
      <div className="d-flex align-items-center justify-content-between bg-light my-4 py-2 px-3">
        <h4>{title} Elanlar</h4>
        <Link href="#" className="text-decoration-none">
          Daha çox
        </Link>
      </div>
    </div>
  );
};

export default SectionTitle;
