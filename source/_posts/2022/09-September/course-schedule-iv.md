---
extends: _layouts.post
section: content
title: Course schedule IV
problemUrl: https://leetcode.com/problems/course-schedule-iv/
date: 2022-09-05
categories: [graph]
---

We will first create an adjacency list from the prerequisites. Then for each queires, we will start DFS from course 1 to course 2, if we can reach to course 2, then we append true in our result, else we append false. Finally, we will return our result after every queires has been run through.

```python
class Solution:
    def checkIfPrerequisite(self, numCourses: int, prerequisites: List[List[int]], queries: List[List[int]]) -> List[bool]:
        self.graph = self.buildGraph(numCourses, prerequisites)
        return [self.dfs(c1, c2, set()) for c1, c2 in queries]
        
    def dfs(self, start: int, target: int, visited: set):
        if start == target:
            return True
        visited.add(start)
        for neighbor in self.graph[start]:
            if neighbor not in visited:
                if self.dfs(neighbor, target, visited):
                    return True
        return False
        
    def buildGraph(self, numCourses: int, prerequisites: List[List[int]]) -> dict:
        graph = {}
        for i in range(numCourses):
            graph[i] = []
        for c1, c2 in prerequisites:
            graph[c1].append(c2)
        return graph
```

Time Complexity: `O(q*(n+p))`, q is the number of queires, n is number of courses and p is the number of prerequisites. <br/>
Space Complexity: `O(n+p)`