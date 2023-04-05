export function setCats(state, [loading, data = null]) {
    if (data) {
        state.cats = {
            ...state.cats,
            data: data.data,
            links: data.meta?.links,
            page: data.meta.current_page,
            limit: data.meta.per_page,
            from: data.meta.from,
            to: data.meta.to,
            total: data.meta.total,
        };
    }
    state.cats.loading = loading;
}
