/******************************************************************************
 * Title: Exercise Tracker - General Use Queries
 * Author: Mark Giles
 * Last Modification: 7/27/2015
 * Date Created: 7/27/2015
 * Filename: generalUse.sql
 * Description: This file is used to modify data in tables for the exercise
 *   tracker project. As many of these will be populated dynamically through
 *   PHP mysqli, they are not able to be used directly as MYSQL queries. In the
 *   areas where variable input is required, I've placed the variables in
 *   brackets for ease of identification.
 *****************************************************************************/
 /*****************************************************************************
 * SELECT [data] FROM [tableName]
 * This section covers queries used to select various elements of data from the
 * people table. These are pretty self explanatory and would be redundant to
 * list all possibilities, but below there are a few examples.
 *****************************************************************************/
/*
EX 1: Select everything from the people table:
  SELECT * FROM people
EX 2: Select everything from the people table with their favorites listed:
  SELECT p.*,
         e.name,
         e.description,
         e.muscleGroup,
         e.category,
         f.name,
         f.description,
         f.category,
         f.unit
  
  FROM people p
  INNER JOIN favoritePeopleExercises fpe ON fpe.personID = p.id
  INNER JOIN favoritePeopleFoodItems fpf ON fpf.personID = p.id
  INNER JOIN exercises e ON e.id = fpe.exerciseID
  INNER JOIN foodItems f ON f.id = fpf.foodID
*/

/*****************************************************************************
 * SELECT [data] FROM [tableName]
 * This section covers queries used to select various elements of data from the
 * people table. These are pretty self explanatory and would be redundant to
 * list all possibilities, but below there are a few examples.
 *****************************************************************************/
