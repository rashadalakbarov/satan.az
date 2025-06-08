"use client";

import React, { useEffect, useState } from "react";

type CityProps = {
  slug: string;
  name: string;
};

const CityForm = () => {
  const [cities, setCities] = useState<CityProps[]>([]);

  useEffect(() => {
    const fetchCities = async () => {
      const res = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/api/cities`);
      const data = await res.json();
      setCities(data);
    };

    fetchCities();
  }, []);

  return (
    <div className="form-floating mb-2">
      <select name="city" className="form-select" id="formCity">
        <option value="">İstənilən şəhər seçin</option>
        {cities.map((city) => (
          <option key={city.slug} value={city.slug}>
            {city.name}
          </option>
        ))}
      </select>
      <label htmlFor="formCity">Şəhər seç</label>
    </div>
  );
};

export default CityForm;
