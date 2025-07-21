<template>
    <div>
        <h1>Tasks</h1>
        <div class="task-container">
            <div class="task-list">
                <ul>
                    <li v-for="task in tasks" :key="task.id">
                        <a :href="task.link">{{ task.title }}</a>
                        <p>{{ task.description }}</p>
                    </li>
                </ul>
            </div>
            <div class="task-search">
                <input type="text" v-model="search" placeholder="Search for a task...">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        tasks: Array,
    },
    data() {
        return {
            search: '',
        };
    },
    watch: {
        search(value) {
            this.$inertia.get(route('tasks.index'), { search: value }, {
                preserveState: true,
            });
        },
    },
};
</script>

<style scoped>
.task-container {
    max-width: 800px;
    margin: 0 auto;
}

.task-list {
    margin-bottom: 20px;
}

.task-search {
    margin-bottom: 20px;
}
</style>
