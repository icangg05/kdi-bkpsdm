import { clsx, type ClassValue } from 'clsx';
import { twMerge } from 'tailwind-merge';

export function cn(...inputs: ClassValue[]) {
  return twMerge(clsx(inputs));
}

export function convertOembed(html: string) {
  return html.replace(
    /<oembed\s+url="([^"]+)"><\/oembed>/g,
    (_match: string, url: string) => {
      try {
        const parsedUrl = new URL(url);
        const videoId = parsedUrl.searchParams.get('v');
        if (!videoId) return ''; // jika tidak ada parameter v, skip

        return `
          <iframe
            class="aspect-video w-full"
            src="https://www.youtube.com/embed/${videoId}"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        `;
      } catch {
        return ''; // skip jika URL invalid
      }
    }
  );
}

// Link diketik admin di dashboard, jadi bentuknya tidak dijamin.
// Menangani watch?v=, youtu.be/, /embed/, /shorts/, dan mengembalikan null
// (bukan melempar) untuk teks yang bukan URL.
export function getYoutubeId(url: string): string | null {
  try {
    const urlObj = new URL(url);
    const dariQuery = urlObj.searchParams.get('v');
    if (dariQuery) return dariQuery;

    const segmen = urlObj.pathname.split('/').filter(Boolean);
    if (urlObj.hostname.includes('youtu.be')) return segmen[0] ?? null;
    if (segmen[0] === 'embed' || segmen[0] === 'shorts') return segmen[1] ?? null;
    return null;
  } catch {
    return null;
  }
}

export function getYoutubeThumbnail(url: string) {
  const id = getYoutubeId(url);
  return id ? `https://img.youtube.com/vi/${id}/hqdefault.jpg` : '/img/default-publikasi.png';
}

export function getYoutubeEmbedUrl(url: string) {
  return `https://www.youtube.com/embed/${getYoutubeId(url)}?autoplay=1&rel=0`;
}


export function getOriginalFilename(path: any) {
  // Ambil nama file saja dari path
  const filenameWithExt = path.split('/').pop(); // misal: data-harian-52-30-07-2025.pdf

  // Ambil nama tanpa ekstensi
  const filename = filenameWithExt.replace(/\.[^/.]+$/, ""); // hasil: data-harian-52-30-07-2025

  // Gunakan regex untuk hilangkan -ss-dd-mm-yyyy di akhir
  const match = filename.match(/^(.*)-\d{2}-\d{2}-\d{2}-\d{4}$/);

  if (match) {
    return match[1]; // nama file asli tanpa timestamp
  }

  // fallback jika format tidak sesuai
  return filename;
}


export function formatTanggalIndo(tanggalString: string) {
  const tanggal = new Date(tanggalString);
  return new Intl.DateTimeFormat('id-ID', {
    day: 'numeric',
    month: 'long',
    year: 'numeric',
  }).format(tanggal);
}


export function refactorFormat(value: string) {
  const currentOrigin = window.location.origin;

  value = value.replace(
    /src="https?:\/\/[^\/]+/gi,
    `src="${currentOrigin}`
  );

  return value;
}

