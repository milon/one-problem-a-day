---
extends: _layouts.post
section: content
title: Detect squares
problemUrl: https://leetcode.com/problems/detect-squares/
date: 2022-08-07
categories: [math-and-geometry]
---

We will keep track of each elements in a list and their respective points count in a hashmap. Whenever we add a point, we increment the points count and also add the point in points list. We we calculate the count, we check it have a squares with that point or not, if it forms a square, then we multiply the points count of those points and add it to the result.

```python
class DetectSquares:
    def __init__(self):
        self.ptsCount = defaultdict(int)
        self.pts = []

    def add(self, point: List[int]) -> None:
        self.ptsCount[tuple(point)] += 1
        self.pts.append(point)

    def count(self, point: List[int]) -> int:
        res = 0
        px, py = point
        for x, y in self.pts:
            if (abs(py - y) != abs(px - x)) or x == px or y == py:
                continue
            res += self.ptsCount[(x, py)] * self.ptsCount[(px, y)]
        return res

# Your DetectSquares object will be instantiated and called as such:
# obj = DetectSquares()
# obj.add(point)
# param_2 = obj.count(point)
```

Time Complexity: `O(1)` for add, `O(n)` for count
Space Complexity: `O(n)`