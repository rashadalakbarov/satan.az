import React from "react";

// components
import CardItem from "@/components/CardItem";

type ProfileProductSection = {
  title: string;
};

const ProfileProductSection = ({ title }: ProfileProductSection) => {
  return (
    <div>
      <h2 className="mb-3 border-bottom fs-5 pb-2">{title}</h2>
      <div className="row">
        <CardItem />
        <CardItem />
        <CardItem />
        <CardItem />
      </div>
    </div>
  );
};

export default ProfileProductSection;
