import re
import sys
import math
import pickle
import pandas as pd

# Cek argumen
if len(sys.argv) != 3:
    print("\nGunakan:\n\t python tf-idf_csv.py [input.csv] [output.pkl]\n")
    sys.exit(1)

input_csv = sys.argv[1]
output_file = sys.argv[2]

# Load stopword
stopwords = open("stopword.txt", encoding='utf-8').read().splitlines()

# Fungsi untuk membersihkan teks
def clean_str(text):
    if pd.isna(text):
        return ""
    text = (text.encode('ascii', 'ignore')).decode("utf-8")
    text = re.sub("&.*?;", "", text)
    text = re.sub(">", "", text)
    text = re.sub("[\]\|\[\@\,\$\%\*\&\\\(\)\":]", "", text)
    text = re.sub("-", " ", text)
    text = re.sub("\.+", "", text)
    text = re.sub("^\s+", "", text)
    text = text.lower()
    return text

# Baca CSV
df = pd.read_csv(input_csv)

# Kolom teks yang akan digabung untuk proses indexing
text_columns = [
    "surah_latin", "surah_transliteration", "surah_translation",
    "latin", "translation", "tafsir_wajiz", "tafsir_tahlili",
    "tafsir_intro_surah", "tafsir_outro_surah", "tafsir_munasabah_prev_surah",
    "tafsir_munasabah_prev_theme", "tafsir_theme_group", "tafsir_kosakata",
    "tafsir_sabab_nuzul", "tafsir_conclusion", "arabic"
]

# Siapkan struktur data
tf_data = {}
df_data = {}
content = []

# Iterasi data
for idx, row in df.iterrows():
    combined_text = " ".join(str(row[col]) for col in text_columns if col in row and pd.notna(row[col]))
    clean_text = clean_str(combined_text)
    words = [w for w in clean_text.split() if w not in stopwords]

    tf = {}
    for word in words:
        tf[word] = tf.get(word, 0) + 1
        df_data[word] = df_data.get(word, 0) + 1

    url_key = f"{row.get('surah_id', '')}:{row.get('ayah', '')}"
    tf_data[url_key] = {
        "meta": {
            "surah_id": row.get("surah_id"),
            "ayah": row.get("ayah"),
            "latin": row.get("latin"),
            "translation": row.get("translation"),
            "arabic": row.get("arabic"),
            "surah_location": row.get("surah_location"),
            "juz": row.get("juz"),
            "page": row.get("page"),
            "tafsir_wajiz": row.get("tafsir_wajiz"),
            "surah_latin": row.get("surah_latin"),
        },
        "tf": tf
    }

# Hitung IDF
idf_data = {}
total_docs = len(tf_data)
for word in df_data:
    idf_data[word] = 1 + math.log10(total_docs / df_data[word])

# Hitung TF-IDF
tf_idf = {}
for word in df_data:
    doc_list = []
    for doc_id, data in tf_data.items():
        tf_val = data["tf"].get(word, 0)
        score = tf_val * idf_data[word]
        if score > 0:
            doc_list.append({
                "doc_id": doc_id,
                "score": score,
                **data["meta"]
            })
    tf_idf[word] = doc_list

# Simpan hasil ke file pickle
with open(output_file, "wb") as f:
    pickle.dump(tf_idf, f)

print(f"Sukses menyimpan TF-IDF ke {output_file}")
