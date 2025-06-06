export async function getSiteSettings() {
  const res = await fetch('http://localhost:8000/api/configs');
  return res.json(); // { site_name: "...", logo_url: "...", ... }
}