// eslint-disable-next-line import/prefer-default-export
export const formatPostError = ({
  message,
  errors,
}) => {
  let errorMessage = `${message}<br />`;

  Object.values(errors).forEach((value) => {
    if (typeof value === 'string') {
      errorMessage += `${value}<br />`;
    } else {
      errorMessage += `${value.join(' ')}<br />`;
    }
  });

  return errorMessage;
};
