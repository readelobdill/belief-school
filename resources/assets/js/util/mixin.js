export default function(Parent, ...mixins) {
    class Mixed extends Parent {}
    for (let mixin of mixins) {
        for (let prop of Object.keys(mixin)) {
            debug('mixin %s', prop);
            Mixed.prototype[prop] = mixin[prop];
        }
    }
    return Mixed;
};