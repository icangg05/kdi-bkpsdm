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

export function getYoutubeId(url: string) {
  const urlObj = new URL(url);
  const videoId = urlObj.searchParams.get('v');
  return videoId
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
