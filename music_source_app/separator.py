from spleeter.separator import Separator
import argparse
import sys
import os
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
    param: 
        num_stems: int 
        user_id: str 
        filename: str (including extension, {filename}.{codec}) 
    return: 
    '''
    filename = str(filename)
    filename_format = str(user_id) + "_{filename}_{instrument}.{codec}"
    dest = str("music/" + str(user_id) + str(filename))
    # dest = str(str(user_id) + str(filename))
    try: 
        separator = Separator('spleeter:'+ str(num_stems) + 'stems')
        # separator.separate_to_file(filename_format="music/" + str(user_id) + "_{filename}_{instrument}.{codec}", 
        #                         audio_descriptor=filename, 
        #                         destination="music/" + str(user_id) + str(filename))
        separator.separate_to_file(filename_format=filename_format, 
                                    audio_descriptor=filename, 
                                    destination=dest)
        # list_files = os.listdir("/music/" + str(user_id) + str(filename)) 
        # TODO: return file_path instead of file_name only 
        # suggestion: file_path = [ x = dest + x for x in list_files ]
        list_files = os.listdir(dest) 
        return list_files
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