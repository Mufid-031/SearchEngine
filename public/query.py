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
        return df.astype(str).apply(lambda row: ' '.join(row), axis=1).tolist()
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
    # pdf_data = read_pdf(os.path.join(base_path, 'data.pdf'))
    csv_data = read_csv(os.path.join(base_path, 'surah.csv'))
    # json_data = read_json(os.path.join(base_path, 'data.json'))

    # all_data = pdf_data + csv_data + json_data

    all_data = csv_data

    for item in all_data:
        if query.lower() in item.lower():
            results.append({
                "title": item[:80],
                "price": "$0.00",
                "image": "media/cache/df/62/df6275ec7cb30dd60d2123a6f513ab65.jpg"
            })
            if len(results) >= 10:
                break

    return results

if __name__ == "__main__":
    if len(sys.argv) < 4:
        print("Usage: python query.py indexdb <limit> <query>")
        sys.exit(1)

    query = sys.argv[3]
    results = search_data(query)

    for result in results:
        print("▶" + json.dumps(result))
