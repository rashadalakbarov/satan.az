export async function getApi(val: string) {
   try {
    const res = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/api/${val}`, {
      cache: "no-store", // opsiyonel: SSR veya ISR için
    });

    if (!res.ok) throw new Error("API Error");

    return await res.json();
  } catch (error) {
    console.error("getApi error:", error);
    return null;
  }
}