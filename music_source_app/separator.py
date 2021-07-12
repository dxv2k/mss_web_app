from spleeter.separator import Separator
import argparse
import os
import warnings 
warnings.filterwarnings('ignore')
# separator = Separator('spleeter:' + sys.argv[1:][0])
# separator.separate_to_file(sys.argv[2:][0], './')
# parser = argparse.ArgumentParser(description="")
# parser.add_argument("stems")
# parser.add_argument("src_audio_path")
# parser.add_argument("src_audio_path")

def perform_separate(
    num_stems, 
    user_id, 
    filename
): 
    u''' 
    Perform separation with given (num_stems,user_id,filename). 
    Create folder {user_id}/{file_name.codec} (if exists, don't create new) & place
    separated tracks in its with filename format: {user_id}_{file_name}_{instruent}.{codec} 
    param: 
        num_stems: int; 2/4/5 stems 
        user_id: str; any user_id is accept now 
        filename: str (including extension, {filename}.{codec}) 
    return: 
        [file_path1, file_path2,...]: file_path of each file 
    '''
    filename = str(filename)
    filename_format = str(user_id) + "_{filename}_{instrument}.{codec}"
    dest = str("music/" + str(user_id) + str(filename))
    # dest = str(str(user_id) + str(filename))
    try: 
        separator = Separator('spleeter:'+ str(num_stems) + 'stems')
        separator.separate_to_file(filename_format=filename_format, 
                                    audio_descriptor=filename, 
                                    destination=dest)
        list_files = os.listdir(dest) # get all file_names in destination directory   
        return [dest + "/" + x for x in list_files] # return file_path of each files
    except Exception as excpt:  
        err_mssg = str(type(excpt)) + "\n" + str(excpt) 
        return err_mssg

if __name__ == '__main__':  
    files = perform_separate(2,1,'./music.mp3')
    print(files)
    # separator = Separator('spleeter:4stems')
    # separator.separate_to_file(filename_format="music/{filename}_{instrument}.{codec}", 
    #                         audio_descriptor="./music.mp3", 
    #                         destination="./")

    # filenames = os.listdir('./music')
    # print(filenames)