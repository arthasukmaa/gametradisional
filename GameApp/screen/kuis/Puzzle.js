import React,{
    useState,
    useEffect,
    useMemo,
    useCallback
} from 'react';
import { 
    View, 
    Text,
    StatusBar,
    Dimensions,
    TouchableOpacity,
    Image,
    Modal,
    Alert,
    FlatList
} from 'react-native';
import Icons from 'react-native-vector-icons/Feather';
import { 
    PicturePuzzle, 
    PuzzlePieces 
} from 'react-native-picture-puzzle';
import Icon from 'react-native-vector-icons/Feather';
import AsyncStorage from '@react-native-async-storage/async-storage';
import { PacmanIndicator } from 'react-native-indicators';
import PLAYER_API from './../api/DataApi';
import IMAGE_API from './../api/ImageApi';
const windowWidth = Dimensions.get('window').width;
const windowHeight = Dimensions.get('window').height;

const Puzzle = ({navigation}) => {

    const [modalVisible, setModalVisible] = useState(false);
    const [loading, setLoading] = useState(true);
    const [datakuis, setdatakuis] = useState('');

    useEffect(() => {
        ambilKuis()
    }, []);

    async function ambilKuis() {
        const ids = await AsyncStorage.getItem('siPlayer');
        fetch(`${PLAYER_API}/kuis/${ids}`)
            .then(response => response.json())
            .then(async function (data) {

                if (data.code === 200) {
                    setLoading(false)
                    setdatakuis(data.data.kuis)
                } else {
                    setLoading(false)
                    Alert.alert(`${data.code}`, `${data.data}`, [
                        { text: 'OK' },
                    ])
                }

            })
            .catch((error) => {
                setLoading(false)
                Alert.alert('404', `${error.message}`, [
                    {
                        text: 'Muat Ulang',
                    },
                ])
            });
    }


    const [lebar, setlebar] = useState(windowWidth);
    const [hidden, setHidden] = useState(0);
    const [pieces, setPieces] = useState([0, 1, 2, 3, 4, 5, 6, 7, 8]);

    const onChange = useCallback((nextPieces: PuzzlePieces, nextHidden: number | null): void => {
        setPieces(nextPieces);
        setHidden(nextHidden);
      }, [setPieces, setHidden]);

      
    if (loading) {
        return (
            <View className="flex-1 bg-white items-center justify-center">
                <StatusBar
                    barStyle={'dark-content'}
                    backgroundColor="transparent"
                    translucent
                />
                <PacmanIndicator color="#4f46e5" size={100} count={9} />
            </View>
        );
    }


    function renderItem({item}){
      
        return(
            <TouchableOpacity
                onPress={()=> navigation.navigate("Susungambar", {item})}
            >
                <View className="flex justify-end items-end px-6 pb-3">
                    <Image className="w-full h-[200px] rounded-lg" source={{ uri: `${IMAGE_API}/${item.gambar}` }}/>
                </View>
            </TouchableOpacity>
        )
    }
      
    
    return (
        <View className="flex-1 bg-purple-600">
            <StatusBar barStyle={'light-content'} backgroundColor={'transparent'} translucent />
            <View className="flex flex-row items-center pt-12 px-6 pb-4 bg-purple-700">
                <TouchableOpacity onPress={() => navigation.navigate("Kuis")}>
                    <Icon name="arrow-left" size={24} color={'white'} />
                </TouchableOpacity>
                <Text className="text-white font-bold text-2xl ml-8">PUZZLE</Text>
            </View>
            
            <FlatList
                data={datakuis}
                renderItem={renderItem}
            />
        </View>
    )
}

export default Puzzle