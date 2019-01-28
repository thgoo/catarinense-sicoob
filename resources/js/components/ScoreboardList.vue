<template>
    <div class="scoreboard-list">
        <div class="title">Rodada {{ index + 1 }}</div>
        <div class="swiper-container sc2">
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
.scoreboard-list {
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
