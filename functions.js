function formatName(name) {
    if (!name) return "";
    let formatted = name.replace(/_/g, ' ');
    return formatted.replace(/\b\w/g, char => char.toUpperCase());
}