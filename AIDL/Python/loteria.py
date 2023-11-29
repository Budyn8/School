import random

def losowanie(tabela):

  dlugosc = len(tabela)
  wynik = {}
  for val in tabela:
    wynik[val] = 0

  for i in range(0, 10):
    wynik[random.choice(tabela)] += 1

  print(wynik) 
  
if __name__ == "__main__":
  losowanie(['Fizyka', 'Matematyka', 'Informatyka'])
