import datetime
import os


def creating_folder():

    main_path = r'C:\xampp\htdocs\5ti\School\Paibd'
    folder_name = str(datetime.date.today())
    path = os.path.join(main_path, folder_name)
    if os.path.exists(path):
        return 'Plik już istnieje'

    os.mkdir(path)
    return 'Folder został stworzony'


if __name__ == '__main__':

    print(creating_folder())
