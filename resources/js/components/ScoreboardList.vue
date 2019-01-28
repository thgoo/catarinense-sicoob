<template>
    <div class="scoreboard-list">
        <div class="title">Rodada {{ index + 1 }}</div>
        <div class="swiper-container sc2">
            <div class="swiper-button-prev2">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="swiper-button-next2">
                <i class="fas fa-chevron-right"></i>
            </div>
            <div class="swiper-wrapper">
                <div
                    class="swiper-slide"
                    v-for="round in rounds"
                >
                    <div class="scoreboard-list-wrapper">
                        <scoreboard
                            :game="game"
                            :key="game.game_id"
                            v-for="game in round.games"
                        ></scoreboard>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Swiper from 'swiper';
import Scoreboard from './Scoreboard.vue';

export default {
    components: { Scoreboard },
    data() {
        return {
            last_round: 0,
            rounds: [],
            swiper: {},
        };
    },
    computed: {
        index() {
            return this.swiper.activeIndex;
        },
    },
    async mounted() {
        try {
            let res = await window.axios.get('/api/scoreboard');
            this.rounds = res.data.rounds;
            this.last_round = res.data.last_round.number

            this.$nextTick(() => {
                let options = {
                    navigation: {
                        nextEl: '.swiper-button-next2',
                        prevEl: '.swiper-button-prev2',
                    },
                    centeredSlides: true,
                    slidesPerView: 1.3,
                    breakpointsInverse: true,
                    spaceBetween: 20,
                    initialSlide: this.last_round - 1,
                    breakpoints: {
                        600: {
                            slidesPerView: 2,
                        },
                        800: {
                            slidesPerView: 4,
                        },
                        1440: {
                            slidesPerView: 6,
                        }
                    },
                };

                this.swiper = new Swiper('.sc2', options);
            });
        } catch (err) {
            console.log(err);
        }
    },
};
</script>

<style lang="scss" scoped>
.swiper-button-prev2,
.swiper-button-next2 {
    content: '';
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    color: #222222;
    background-color: #ffffff;
    box-shadow: 2px 2px 10px rgba(0,0,0,.25);
    z-index: 10;

    &:active,
    &:focus {
        outline: 0;
    }
}

.swiper-button-prev2 {
    left: 100px;
}

.swiper-button-next2 {
    right: 100px;
}

.swiper-slide {
    opacity: 0.33;

    &.swiper-slide-prev,
    &.swiper-slide-next {
        opacity: 0.66666667;
    }

    &.swiper-slide-active {
        opacity: 1;
    }
}

.scoreboard-list {
    position: relative;
    padding: 50px 0;

    .title {
        margin-bottom: 5px;
        font-family: 'Homestead Inline', sans-serif;
        font-size: 32px;
        line-height: 1;
        text-align: center;
        color: #ffffff;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
}

.scoreboard-list-wrapper {
    max-width: 280px;
    margin: 0 auto;

    .scoreboard {
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
}
</style>
