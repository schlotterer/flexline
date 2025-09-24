# 🧩 Font Conversion Guide for Flexline Theme

This document outlines how to convert a variable font in `.ttf` format (such as from Google Fonts) into an optimized `.woff2` version that preserves full variable font functionality for use in the Flexline WordPress theme.

---

## ✅ Prerequisites

Ensure you have Python 3 and `pip` available:

```bash
python3 --version
python3 -m pip --version
```

### If `pip` is missing:

Run:

```bash
sudo easy_install pip
```

---

## 📦 Install Required Packages

Install the following libraries using `pip`:

```bash
python3 -m pip install fonttools brotli zopfli
```

---

## 📁 Folder Location

Place your `.ttf` variable font file here:

```bash
/assets/fonts/<FontName>/<FontFile>.ttf
```

Example:

```bash
/assets/fonts/Montserrat/Montserrat-VariableFont_wght.ttf
```

---

## 🛠️ Convert TTF to WOFF2 (Full Variable Font)

Run this from the root of the theme:

```bash
python3 -m fontTools.subset ./assets/fonts/Montserrat/Montserrat-VariableFont_wght.ttf \
  --flavor=woff2 \
  --output-file=./assets/fonts/Montserrat/Montserrat-VariableFont_wght.woff2 \
  --layout-features='*' \
  --glyphs='*' \
  --retain-gids \
  --name-legacy \
  --name-languages='*' \
  --recalc-bounds \
  --recalc-average-width \
  --glyph-names
```

✅ This command will preserve all glyphs and OpenType features and generate a `.woff2` file that maintains the full `wght` axis range (100–900).

---

## 🔁 Optional: Bash Script

Create a helper script `convert-fonts.sh` to automate conversion:

```bash
#!/bin/bash

FONT_NAME=$1

if [ -z "$FONT_NAME" ]; then
  echo "Usage: ./convert-fonts.sh FontName"
  exit 1
fi

SRC="./assets/fonts/$FONT_NAME/${FONT_NAME}-VariableFont_wght.ttf"
OUT="./assets/fonts/$FONT_NAME/${FONT_NAME}-VariableFont_wght.woff2"

if [ ! -f "$SRC" ]; then
  echo "Font not found: $SRC"
  exit 1
fi

python3 -m fontTools.subset "$SRC" \
  --flavor=woff2 \
  --output-file="$OUT" \
  --layout-features='*' \
  --glyphs='*' \
  --retain-gids \
  --name-legacy \
  --name-languages='*' \
  --recalc-bounds \
  --recalc-average-width \
  --glyph-names

echo "✅ Converted $SRC to $OUT"
```

Make it executable:

```bash
chmod +x convert-fonts.sh
```

Run it with:

```bash
./convert-fonts.sh Montserrat
```

---

## 💡 Notes

* Do **not** use converters like Font Squirrel or Transfonter for variable fonts unless they explicitly support them (they often flatten to a single weight).
* If you see `"Failed to decode downloaded font"` or `"glyf: zero-length table"`, the file was likely corrupted or incorrectly subset.
* You can inspect your WOFF2 with tools like [wakamaifondue.com](https://wakamaifondue.com/) to verify axis support.

---

## 📄 Next Steps

Once you've successfully generated the `.woff2`, make sure to:

* Reference it in your `theme.json`
* Include fallback font faces
* Commit the generated file to the repo with a message like:

```text
Add Montserrat variable font as WOFF2, preserving full weight axis
```

---

## ✅ Done!

You're now using an optimized web-ready variable font that loads fast and retains full typographic control 🎉




✅ Conversion for Static Fonts

You can still convert these .ttf files into .woff2 for optimized web use.

🔁 Use this command per file:
python3 -m fontTools.subset ./assets/fonts/Cabin/Cabin-Bold.ttf \
  --flavor=woff2 \
  --output-file=./assets/fonts/Cabin/Cabin-Bold.woff2 \
  --layout-features='*' \
  --glyphs='*' \
  --retain-gids \
  --name-legacy \
  --name-languages='*' \
  --recalc-bounds \
  --recalc-average-width \
  --glyph-names


Do this for each font file individually.