import React, {
    useState,
    useCallback
} from 'react';
import {
    View,
    Text,
    StatusBar,
    Dimensions,
    TouchableOpacity,
    Image,
} from 'react-native';
import Icon from 'react-native-vector-icons/Feather';
import {
    PicturePuzzle,
    PuzzlePieces
} from 'react-native-picture-puzzle';

import { CountdownCircleTimer } from 'react-native-countdown-circle-timer'
const windowWidth = Dimensions.get('window').width;
const windowHeight = Dimensions.get('window').height;
import IMAGE_API from './../api/ImageApi';

const lose = require('./../../assets/icons/lose.png')

const Susungambar = ({ navigation, route }) => {

    const [notif, setnotif] = useState(false)
    const [gambar, setgambar] = useState(route.params.item.gambar);
    const [lebar, setlebar] = useState(windowWidth);

    const [hidden, setHidden] = React.useState(0); // piece to obscure
    const [pieces, setPieces] = React.useState([0, 1, 2, 3, 4, 5, 6, 7, 8]);
    const source = React.useMemo(() => ({
        uri: `${IMAGE_API}/${gambar}`,
    }), []);
    const renderLoading = React.useCallback();
    const onChange = React.useCallback((nextPieces: PuzzlePieces, nextHidden: number | null): void => {
        setPieces(nextPieces);
        setHidden(nextHidden);
    }, [setPieces, setHidden]);

    if(notif){
        setTimeout(() => {
            navigation.replace("Puzzle")
        }, 2000);
    }

    return (
        <View className="flex-1 bg-purple-600">

            <StatusBar barStyle={'light-content'} backgroundColor={'transparent'} translucent />
            {
                notif ? (
                    <View className="absolute flex-1 w-full h-full bg items-center justify-center p-6 z-50" style={{ backgroundColor: 'rgba(0,0,0,0.5)' }}>
                        <View className="p-6 bg-red-600 w-full relative flex items-center rounded-xl">
                            <View className="absolute top-[-100px]">
                                <Image source={lose} className="w-[150px] h-[150px]" resizeMode='cover' />
                            </View>
                            <View className="mt-12">
                                <Text className="text-white text-center font-bold text-xl mb-2">Waktu anda Telah Habis</Text>
                                <Text className="text-white text-center font-medium text-base">Silahkan mulai untuk menyusun fuzzle kembali.</Text>
                            </View>
                        </View>
                    </View>
                ) : null
            }
            <View className="flex flex-row items-center pt-12 px-6 pb-4 bg-purple-700">
                <TouchableOpacity onPress={() => navigation.replace("Puzzle")}>
                    <Icon name="arrow-left" size={24} color={'white'} />
                </TouchableOpacity>
                <Text className="text-white font-bold text-2xl ml-8">SUSUN PUZZLE</Text>
            </View>

            <View className="flex flex-row justify-between items-center p-6">
                <CountdownCircleTimer
                    isPlaying
                    duration={180}
                    colors={['#004777', '#F7B801', '#A30000', '#A30000']}
                    colorsTime={[300, 250, 150, 0]}
                    size={100}
                    onComplete={() => {
                        return (
                            setnotif(true)
                        )
                    }}
                >
                    {({ remainingTime }) => <Text className="text-white font-bold text-xl">{remainingTime}</Text>}
                </CountdownCircleTimer>
                <Image className="w-[200px] h-[200px] rounded-lg" source={{ uri: `${IMAGE_API}/${gambar}` }} />
            </View>
            <View className="mt-0">

                <PicturePuzzle
                    size={windowWidth}
                    pieces={pieces}
                    hidden={hidden}
                    onChange={onChange}
                    source={source}
                    renderLoading={renderLoading}
                />

            </View>
        </View>
    )
}

export default Susungambar