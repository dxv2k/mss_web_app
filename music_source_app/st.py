from spleeter.separator import Separator
import sys

# separator = Separator('spleeter:' + sys.argv[1:][0])
# separator.separate_to_file(sys.argv[2:][0], './')
if __name__ == '__main__':  
    separator = Separator('spleeter:'+sys.argv[1]) # 2stems, 4stems, 5stems 
    separator.separate_to_file(audio_descriptor=sys.argv[2], 
                            destination=sys.argv[3]) #src_path, dest_path
    # separator = Separator('spleeter:2stems')
    # separator.separate_to_file('../user_files/admin1/uploaded/trungtam.mp3', './')