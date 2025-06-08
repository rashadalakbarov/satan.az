export interface SiteSettingItem {
  value: string;
  other: string;
}

export type SiteSettings = Record<string, SiteSettingItem>;
