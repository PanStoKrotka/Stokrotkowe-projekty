# UWAGA! Przed użyciem programu trzeba zainstalować rozszeżenie stdnum.pl poleceniem w terminalu: pip install python-stdnum
# UWAGA! Zawartosć pliku z peselami musi zawierać tylko i wyłącznie numery pesel ułożone jeden pod drugim!
from stdnum.pl import pesel

with open("Python/demofile.txt") as f:  #Tu dać odpowiednią nazwe pliku / ścieżkę do pliku
  while True:
    for line in f:
      is_valid = pesel.is_valid(line.strip())

      # Wyciąganie danych
      if is_valid:
        data_ur = pesel.get_birth_date(line)
        plec = pesel.get_gender(line) # 'M' lub 'F'
        if plec == "M":
          plec2 = "Mężczyzna"
        elif plec == "F":
          plec2 = "Kobieta"
      else:
        data_ur = "Niepoprawny pesel"
        plec2 = ""
      print(line.strip(), data_ur, plec2)
  

