from spleeter.separator import Separator
import argparse
import os
import warnings 
warnings.filterwarnings('ignore')

def handle_args(): 
    u''' 
    Handling arguments 
    '''
    parser = argparse.ArgumentParser(description='')
    parser.add_argument('-ns',
                        '--num_stems', 
                        type = int,
                        help = 'Number of stems; 2/4/5 stems separation')
    parser.add_argument('-uid',
                        '--user_id', 
                        type = int,
                        help = 'User ID')
    parser.add_argument('-f',
                        '--filename', 
                        help = 'Set number of minimum matches keypoint',
                        type=argparse.FileType('r')) 
    args = parser.parse_args()

    return args

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
    # files = perform_separate(2,1,'./music.mp3')
    print("hello") 
    args = handle_args() 
    files = perform_separate(num_stems=args.num_stems,
                            user_id=args.user_id, 
                            filename=args.filename.name)
    print(files)