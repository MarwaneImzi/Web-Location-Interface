CREATE TABLE [dbo].[students] (
    [ID]           BIGINT           NOT NULL,
    [StudentID]    BIGINT           NOT NULL,
    [FirstName]    VARCHAR (MAX)  NOT NULL,
    [Surname]      VARCHAR (MAX) NOT NULL,
    [location]      VARCHAR (MAX)  NOT NULL,
    [dateModified] DATETIME      NOT NULL, 
    [DateCreated] DATETIME NOT NULL
);

