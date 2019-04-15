<template>
    <div class="scoreboard">
        <div class="game">
            <div class="teams">
                <div class="team home">
                    <div class="picture" :style="{ backgroundImage: `url('${game.home.image}')` }"></div>
                    <div class="name">{{ game.home.name }}</div>
                    <div class="score">
                        {{ game.home_score }}
                        <span v-if="game.home_score_penalty">({{ game.home_score_penalty }})</span>
                    </div>
                </div>
                <div class="team guest">
                    <div class="picture" :style="{ backgroundImage: `url('${game.guest.image}')` }"></div>
                    <div class="name">{{ game.guest.name }}</div>
                    <div class="score">
                        {{ game.guest_score }}
                        <span v-if="game.guest_score_penalty">({{ game.guest_score_penalty }})</span>
                    </div>
                </div>
            </div>
            <div class="date">{{ game.match_time }}</div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        game: {
            type: Object,
            required: true,
        },
    },
};
</script>

<style lang="scss" scoped>
.scoreboard {
    display: flex;
    flex-direction: column;
    margin: 0 auto;
    background-color: #ffffff;
    font-size: 12px;

    &:hover {
        background-color: #fafafa;
    }

    .game {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 10px;

        .teams {
            display: flex;
            flex-direction: column;
            flex: 1;
            padding: 10px 0 10px;

            .team {
                display: flex;
                align-items: center;

                &.guest {
                    margin-top: 10px;
                }

                .picture {
                    flex: 0 0 24px;
                    height: 24px;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: contain;
                }

                .name {
                    margin-left: 10px;
                    width: 100%;
                }

                .score {
                    display: flex;
                    margin-right: 10px;
                    text-align: center;

                    span {
                        margin-left: 5px;
                    }
                }
            }
        }

        .date {
            flex: 0 0 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 60px;
            padding-left: 10px;
            border-left: 2px solid rgba(0, 0, 0, 0.05);
            text-align: center;
            color: rgba(0, 0, 0, 0.54);
        }
    }
}
</style>
