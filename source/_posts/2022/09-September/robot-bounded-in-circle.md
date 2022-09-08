---
extends: _layouts.post
section: content
title: Robot bounded in circle
problemUrl: https://leetcode.com/problems/robot-bounded-in-circle/
date: 2022-09-08
categories: [math-and-geometry]
---

The idea is, after the first iteration, if the direction is not north facing or the current position is the start position, then it is a cycle, otherwise not.

First if condition basically encounters the instructions value and changes the co-ordinates acccording to it. Just do it pen and paper how the coordinates changes for each direction. You will get a better understanding. The elif condition just changes the value of face in left direction. For example, if the current face value is "W" than after 90 degree left the value will be "N". Lastly, else condition does the vice-versa of elif condition.

```python
class Solution:
    def isRobotBounded(self, instructions: str) -> bool:
        # direction = {0: 'N', 1: 'E', 2: 'S', 3: 'W'}
        direction, pos = 0, [0, 0]
        
        for c in instructions:
            if c == 'L':
                direction = (direction + 1) % 4
            elif c == 'R':
                direction = (direction - 1) % 4
            elif c == 'G':
                if direction == 0:      # N
                    pos[1] += 1
                elif direction == 1:    # E
                    pos[0] -= 1
                elif direction == 2:    # S
                    pos[1] -= 1
                elif direction == 3:    # W
                    pos[0] += 1
                    
        return pos == [0, 0] or direction != 0
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`