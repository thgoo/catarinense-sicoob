<template>
    <div class="instagram-images">
        <div class="swiper-container sc1">
            <div class="swiper-wrapper">
                <div
                    class="swiper-slide"
                    v-for="image in images"
                >
                    <div
                        class="wrapper"
                        :style="{ backgroundImage: `url(${image.ig_image_url})` }"
                    >
                        <div class="user">
                            <div
                                class="image"
                                :style="{ backgroundImage: `url(${image.ig_user_image_url})` }"
                            ></div>
                            <div class="name">{{ image.ig_username }}</div>
                        </div>
                        <div class="likes"><i class="fas fa-heart"></i>{{ image.ig_like_count }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="no-images" v-if="images.length === 0">Nenhuma imagem até agora.</div>
    </div>
</template>

<script>
import Swiper from 'swiper';

export default {
    data() {
        return {
            images: [],
        };
    },
    async mounted() {
        try {
            let res = await window.axios.get('/api/instagram');
            res.data.images.map(image => {
                this.images.push(image);
            });

            this.$nextTick(() => {
                let options = {
                    loop: true,
                    loopAdditionalSlides: 4,
                    centeredSlides: true,
                    slidesPerView: 1.3,
                    breakpointsInverse: true,
                    breakpoints: {
                        600: {
                            slidesPerView: 2,
                        },
                        800: {
                            slidesPerView: 4,
                        }
                    }
                };
                if(this.images.length < 5) {
                    options.loop = false;
                }

                const swiper = new Swiper('.sc1', options);
            });
        } catch(err) {
            console.log(err);
        }
    },
};
</script>

<style lang="scss" scoped>
.instagram-images {
    position: relative;
    margin-top: -8px;
    width: 100%;
    z-index: 1;

    @media screen and (min-width: 800px) {
        margin-top: -16px;
    }
}

.no-images {
    width: 100%;
    padding: 80px 0;
    background-color: #fff;
    font-size: 12px;
    text-align: center;
}

.swiper-container {
    max-height: 260px;

    @media screen and (min-width: 400px) {
        max-height: 340px;
    }
}

.wrapper {
    position: relative;
    margin: 0 auto;
    width: 90%;
    max-width: 260px;
    height: 0;
    padding-bottom: 90%;
    background-position: center;
    background-size: cover;

    .user {
        position: absolute;
        bottom: 10px;
        left: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 200px;
        height: 28px;

        .image {
            flex: 0 0 28px;
            height: 28px;
            border-radius: 50%;
            background-position: center;
            background-size: cover;
        }

        .name {
            margin-left: 10px;
            width: 100%;
            height: 12px;
            font-size: 12px;
            font-weight: 700;
            color: #ffffff;
        }
    }

    .likes {
        position: absolute;
        right: 10px;
        bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 28px;
        font-size: 12px;
        font-weight: 700;
        color: #ffffff;

        i {
            font-size: 16px;
            margin-right: 5px;
        }
    }

    @media screen and (min-width: 400px) {
        max-width: 340px;
    }
}
</style>
