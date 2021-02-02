module.exports = {
    methods: {
        asset(path) {
            let assetPath = window._assetPath || '';
            return assetPath + path;
        }
    }
}