from spleeter.separator import Separator
import sys

# separator = Separator('spleeter:' + sys.argv[1:][0])
# separator.separate_to_file(sys.argv[2:][0], './')
if __name__ == '__main__':  
    # separator = Separator('spleeter:'+sys.argv[1]) # stems
    # separator.separate_to_file(sys.argv[2], sys.argv[3]) # audio; #output path
    separator = Separator('spleeter:4stems')
    separator.separate_to_file('music.mp3','./')
    # separator.separate_to_file('../user_files/admin1/uploaded/trungtam.mp3', './')