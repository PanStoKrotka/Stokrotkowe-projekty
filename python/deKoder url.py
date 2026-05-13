def deKoder():
    # Znaki kodera
    koder = {
        ' ': '+', # %20
        '!': '%21',
        '"': '%22',
        '#': '%23',
        '$': '%24',
        '%': '%25',
        '&': '%26',
        "'": '%27',
        '(': '%28',
        ')': '%29',
        '+': '%2B',
        ',': '%2C',
        '/': '%2F',
        ':': '%3A',
        ';': '%3B',
        '<': '%3C',
        '=': '%3D',
        '>': '%3E',
        '?': '%3F',
        '@': '%40',
        '[': '%5B',
        ']': '%5D'
    }
    # Znaki dekodera
    dekoder = {
        '+': ' ',
        '%20': ' ',
        '%21': '!',
        '%22': '"',
        '%23': '#',
        '%24': '$',
        '%25': '%',
        '%26': '&',
        '%27': "'",
        '%28': '(',
        '%29': ')',
        '%2A': '*',
        '%2B': '+',
        '%2C': ',',
        '%2D': '-',
        '%2F': '/',
        '%3A': ':',
        '%3B': ';',
        '%3C': '<',
        '%3D': '=',
        '%3E': '>',
        '%3F': '?',
        '%40': '@',
        '%5B': '[',
        '%5D': ']',
        '%5F': '_'
    }

    while True:
        print("1. Zakoduj url")
        print("2. Odkoduj url")
        print("3. Wyjdź")
        odp = input("Podaj numer operacji: ")
        if odp == "1":
            zdanie_z = input("Zakoduj: ")
            # 3. Tworzymy tablicę tłumaczeń i zamieniamy znaki
            tabela_tlumaczen_z = str.maketrans(koder)
            wynik_z = zdanie_z.translate(tabela_tlumaczen_z)
            print("Wynik:", wynik_z)
        elif odp == "2":
            zdanie_o = input("Odkoduj: ")
            # Dla dekodowania używamy pętli i metody .replace()
            wynik_o = zdanie_o
            for klucz, wartosc in dekoder.items():
                wynik_o = wynik_o.replace(klucz, wartosc)
            print("Wynik:", wynik_o)
        elif odp == "3":
            break
        else:
            print("Nieprawidłowy wybór!")
deKoder()