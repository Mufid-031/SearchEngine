import sys
import json
import pandas as pd
from PyPDF2 import PdfReader
import os

def read_pdf(file_path):
    reader = PdfReader(file_path)
    text = ''
    for page in reader.pages:
        if page.extract_text():
            text += page.extract_text() + '\n'
    return text.strip().split('\n')

def read_csv(file_path):
    try:
        df = pd.read_csv(file_path)
        return df.astype(str).to_dict(orient='records')  # Mengembalikan list of dict
    except Exception as e:
        print(f"Failed to read CSV: {e}")
        return []

def read_json(file_path):
    with open(file_path, 'r', encoding='utf-8') as f:
        try:
            json_data = json.load(f)
            if isinstance(json_data, list):
                return [
                    ' '.join(str(value) for value in item.values() if value)
                    for item in json_data
                ]
        except Exception as e:
            print(f"Failed to read JSON: {e}")
    return []

def search_data(query):
    results = []

    base_path = os.path.join(os.path.dirname(__file__), '..', 'public', 'data')
    alquran_csv_data = read_csv(os.path.join(base_path, 'surah.csv'))

    for item in alquran_csv_data:
        # Gabungkan semua nilai item untuk pencarian
        if any(query.lower() in str(value).lower() for value in item.values()):
            results.append({
                "id": item.get("id"),
                "surah_id": item.get("surah_id"),
                "surah_arabic": item.get("surah_arabic"),
                "surah_latin": item.get("surah_latin"),
                "surah_transliteration": item.get("surah_transliteration"),
                "surah_translation": item.get("surah_translation"),
                "surah_num_ayah": item.get("surah_num_ayah"),
                "surah_page": item.get("surah_page"),
                "surah_location": item.get("surah_location"),
                "ayah": item.get("ayah"),
                "page": item.get("page"),
                "quarter_hizb": item.get("quarter_hizb"),
                "juz": item.get("juz"),
                "manzil": item.get("manzil"),
                "arabic": item.get("arabic"),
                "latin": item.get("latin"),
                "translation": item.get("translation"),
                "no_footnote": item.get("no_footnote"),
                "footnotes": item.get("footnotes"),
                "tafsir_wajiz": item.get("tafsir_wajiz"),
                "tafsir_tahlili": item.get("tafsir_tahlili"),
                "tafsir_intro_surah": item.get("tafsir_intro_surah"),
                "tafsir_outro_surah": item.get("tafsir_outro_surah"),
                "tafsir_munasabah_prev_surah": item.get("tafsir_munasabah_prev_surah"),
                "tafsir_munasabah_prev_theme": item.get("tafsir_munasabah_prev_theme"),
                "tafsir_theme_group": item.get("tafsir_theme_group"),
                "tafsir_kosakata": item.get("tafsir_kosakata"),
                "tafsir_sabab_nuzul": item.get("tafsir_sabab_nuzul"),
                "tafsir_conclusion": item.get("tafsir_conclusion"),
            })

            if len(results) > 100:
              break


    return results


if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("Usage: python query.py <query>")
        sys.exit(1)

    query = sys.argv[1]
    results = search_data(query)

    for result in results:
        print(json.dumps(result))
