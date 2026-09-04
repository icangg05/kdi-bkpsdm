# Product

<!-- impeccable:product-schema 1 -->

## Platform

web

## Users

Three confirmed audiences, all Indonesian-speaking, all arriving on the same public site:

- **ASN / PNS Kota Kendari** — serving civil servants looking up regulations, kepegawaian announcements, and the procedure for a specific administrative action (cuti, kenaikan pangkat, mutasi). They usually arrive knowing the name of the thing they need and want the document or the steps, not an introduction.
- **Masyarakat umum** — Kendari residents reading berita/pengumuman, checking ASN statistics, and finding how to contact the agency. Transparency and public-information access is their reason for being here.
- **Pelamar / calon ASN** — people tracking CPNS/PPPK announcements, selection schedules, and requirements. They arrive from a link or a search during a narrow, high-stakes window.

A fourth internal audience uses the admin dashboard: BKPSDM staff who publish berita, pengumuman, regulasi, galeri, pejabat records, and ASN statistics, plus site settings. Pimpinan and SPBE/KIP assessors read the public site as evidence of information completeness.

## Product Purpose

The official website of **BKPSDM Kota Kendari** (Badan Kepegawaian dan Pengembangan Sumber Daya Manusia, Kota Kendari) at `bkpsdm.kendarikota.go.id`. It publishes the agency's kepegawaian information — regulations, announcements, services, official profiles, workforce statistics, and news — and gives its staff a dashboard to keep all of it current. Success is a visitor finding the document, announcement, or procedure they came for without contacting the office, and staff being able to publish without developer help.

## Positioning

It is the authoritative source for Kota Kendari kepegawaian information. Its distinguishing asset is not presentation but jurisdiction: regulasi, statistik ASN, pejabat records, and pengumuman here are the official municipal record, not an aggregation. Nothing on it should read as a claim it does not own.

## Operating Context

- Public site sections: Beranda, Profil (Logo, Sejarah, Struktur Organisasi, Profil Pejabat), Publikasi (Berita, Pengumuman, Statistik Pegawai, Ucapan Selamat, Berita Duka), Layanan, Regulasi, Galeri (Foto, Video), Hubungi Kami.
- The beranda composes: slider, running text (teks berjalan), hero berita, four publication streams, ASN statistics charts, foto/video galleries, informasi layanan, and a satisfaction-survey link to an external Google Form.
- Regulations are filed under twelve official categories: Undang-Undang, Peraturan Pemerintah, Peraturan Presiden, Peraturan Menteri, Peraturan Daerah, Peraturan Wali Kota, Keputusan Wali Kota, Peraturan BKPSDM, Standar Operasional Prosedur (SOP), Surat Edaran, Instruksi, Pedoman Teknis — each downloadable.
- Editorial content is authored in CKEditor 5 in the dashboard, so page bodies arrive as rich HTML with embedded images and attachments (`lampiran`).
- Office hours are Senin–Jumat 08:00–16:00; visits and calls concentrate inside them.

## Capabilities and Constraints

- **Stack (existing):** Laravel 12 + Inertia. Public site is Vue 3 + Tailwind CSS v4 + shadcn-vue (reka-ui), ApexCharts for statistics, Embla for carousels, Lucide icons, Roboto + Lobster fonts. Vite build, optional SSR entry (`resources/js/ssr.ts`).
- **Dashboard is a separate world:** Blade templates on the purchased "Berry" Bootstrap 5 admin template (`public/assets`), with jQuery-era helpers (Tom Select, CKEditor 5). It shares no tokens, components, or type system with the Vue frontend. Any dashboard work happens inside Bootstrap/Blade, not the Tailwind design system.
- **Locale:** Indonesian (`APP_LOCALE=id`), including translated date formatting. All user-facing copy is Indonesian.
- **Content models:** Berita (four kategori), Halaman (profil/layanan/hubungi-kami bodies with gambar, link, lampiran), Regulasi + KategoriRegulasi, Foto, Video, Pejabat + Jabatan + Bagian + UnitOrganisasi, Slider, StatistikASN, Pengaturan.
- **Site settings are database-driven** (`Pengaturan`): phone, email, address, social links, operating hours, survey link, running text. Design must treat these as variable content, never hardcoded.
- Authenticated dashboard access only; image upload is auth-gated deliberately.
- **Undecided:** whether the dashboard keeps the Berry template or moves onto the frontend's system. Both surfaces are in scope for future design work; the order has not been set.

## Brand Commitments

- **Identitas Pemerintah Kota Kendari is binding.** Logo Kendari (`public/img/logo-kendari.png`), municipal colors and lambang, and the official agency naming must be preserved. Design work may not substitute an invented identity.
- Official agency name in full: Badan Kepegawaian dan Pengembangan Sumber Daya Manusia Kota Kendari (BKPSDM Kota Kendari).
- Voice is that of a government instansi addressing both its own staff and the public: formal Indonesian, plain, non-promotional.

## Evidence on Hand

Real, in-repo:

- Agency contact record — phone, `bkpsdm.kendarikota@gmail.com`, Jl. Drs. H. Abdullah Silondae No.8, Gedung Menara Balaikota Kendari Lt.5; operating hours.
- Real social accounts: Instagram `@bkpsdmkendari`, YouTube `@bkpsdmkendari1551`. Facebook and Twitter are placeholders (`#`) — do not present them as live.
- A live satisfaction-survey Google Form link.
- Real content database (`db_bkpsdm.sql`) with berita, regulasi, pejabat, foto, video, and ASN statistics.
- Municipal logo asset.

Absent, and must not be fabricated: testimonials, service-level or performance claims, awards, visitor counts, SPBE/KIP scores, or any statistic not present in `statistik_asn`.

## Product Principles

1. **The record outranks the presentation.** Regulations, announcements, statistics, and officials are official municipal information; design serves retrieval and legibility, never decoration that obscures them.
2. **Arriving with a specific need is the normal case.** Most visitors — ASN, applicant, or resident — come for one document, date, or procedure. Paths to it stay short and named in the words the visitor already uses.
3. **Content is editor-owned and variable.** Everything visible is authored in the dashboard by staff. Layouts must survive long titles, missing images, empty categories, and rich HTML from CKEditor.
4. **Formal, not cold.** The voice is a public institution's, but the site is read by residents in a difficult moment (berita duka), a proud one (ucapan selamat), and an anxious one (seleksi). Tone follows the content.
5. **Public-information completeness is a feature.** Elements required for keterbukaan informasi publik stay reachable, not buried.

## Accessibility & Inclusion

Bound by SPBE / keterbukaan informasi publik obligations: required public-information elements — regulasi, statistik pegawai, kontak, and the satisfaction survey — must remain present and reachable. No further product-specific accessibility standard has been established; general WCAG practice applies as a floor.
