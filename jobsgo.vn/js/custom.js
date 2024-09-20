const updateUrlParams = (paramName, paramValues) => {
    const url = new URL(window.location.href);
    const searchParams = new URLSearchParams(url.search);

    searchParams.delete(paramName);

    const joinedValues = paramValues.join(',');

    searchParams.append(paramName, joinedValues);

    url.search = searchParams.toString();

    return url.href;
};
