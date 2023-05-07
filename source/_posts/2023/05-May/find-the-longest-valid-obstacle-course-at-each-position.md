---
extends: _layouts.post
section: content
title: Find the longest valid obstacle course at each position
problemUrl: https://leetcode.com/problems/find-the-longest-valid-obstacle-course-at-each-position/
date: 2023-05-06
categories: [binary-search]
---

Given an array of integers, find the longest non-decreasing subsequence. This problem is very similar to [Longest increasing subsequence](/problems/longest-increasing-subsequence/). We will solve this with a greedy approach. The key is, the longest course for index i is determined by two factors:

- obstacles[i], which is required.
- the longest course before index i whose last obstacle is shorter than or equal to obstacles[i].

By combining the two terms above, we can determine the longest course for index i.

In short, the longest course ending at index i depends on the courses ending before index i.

```python
class Solution:
    def longestObstacleCourseAtEachPosition(self, obstacles: List[int]) -> List[int]:
        res = []
        courses = []
        for obstacle in obstacles:
            if not courses or obstacle >= courses[-1]:
                courses.append(obstacle)
                res.append(len(courses))
            else:
                index = bisect.bisect_right(courses, obstacle)
                courses[index] = obstacle
                res.append(index + 1)
        return res
```

Time complexity: `O(nlogn)` <br/>
Space complexity: `O(n)`
